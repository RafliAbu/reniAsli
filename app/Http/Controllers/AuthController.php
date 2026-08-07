<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordOtpMail;
use App\Mail\RegisterVerificationMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Email atau password tidak sesuai.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended($this->homeRoute());
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'no_hp' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'No.HP wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'role' => 'masyarakat',
            'password' => Hash::make($data['password']),
            'verification_code' => $code,
            'verification_code_expires_at' => now()->addMinutes(15),
        ]);

        try {
            Mail::to($user->email)->send(new RegisterVerificationMail($user->name, $code));
        } catch (\Throwable $e) {
            Log::error('Gagal mengirim email verifikasi: ' . $e->getMessage());
        }

        session(['verify_email' => $user->email]);

        return redirect()->route('verification.notice')
            ->with('success', 'Kode verifikasi (' . $code . ') telah dikirimkan ke email Anda: ' . $user->email);
    }

    public function showVerifyForm(Request $request): View|RedirectResponse
    {
        $email = session('verify_email') ?? $request->query('email');
        if (! $email) {
            return redirect()->route('login');
        }

        return view('auth.verify', compact('email'));
    }

    public function verifyEmail(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'string', 'size:6'],
        ], [
            'code.required' => 'Kode verifikasi wajib diisi.',
            'code.size' => 'Kode verifikasi harus 6 digit.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => 'Pengguna tidak ditemukan.']);
        }

        if ($user->verification_code !== $request->code) {
            return back()->withErrors(['code' => 'Kode verifikasi tidak sesuai.']);
        }

        if ($user->verification_code_expires_at && $user->verification_code_expires_at->isPast()) {
            return back()->withErrors(['code' => 'Kode verifikasi sudah kadaluarsa. Silakan mendaftar ulang atau minta kode baru.']);
        }

        $user->update([
            'email_verified_at' => now(),
            'verification_code' => null,
            'verification_code_expires_at' => null,
        ]);

        Auth::login($user);
        session()->forget('verify_email');

        return redirect()->route('masyarakat.dashboard')
            ->with('success', 'Verifikasi email berhasil! Selamat datang di Portal Desa Balangka.');
    }

    public function showForgotPassword(): View
    {
        return view('auth.forgot-password');
    }

    public function sendResetCode(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.exists' => 'Email ini belum terdaftar di sistem kami.',
        ]);

        $user = User::where('email', $request->email)->first();
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->update([
            'verification_code' => $code,
            'verification_code_expires_at' => now()->addMinutes(15),
        ]);

        try {
            Mail::to($user->email)->send(new ForgotPasswordOtpMail($user->name, $code));
        } catch (\Throwable $e) {
            Log::error('Gagal mengirim email OTP reset password: ' . $e->getMessage());
        }

        session(['reset_email' => $user->email]);

        return redirect()->route('password.reset')
            ->with('success', 'Kode OTP reset password (' . $code . ') telah dikirimkan ke email Anda: ' . $user->email);
    }

    public function showResetPassword(Request $request): View|RedirectResponse
    {
        $email = session('reset_email') ?? $request->query('email');
        if (! $email) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password', compact('email'));
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'code' => ['required', 'string', 'size:6'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'code.required' => 'Kode OTP wajib diisi.',
            'code.size' => 'Kode OTP harus 6 digit.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->verification_code !== $request->code) {
            return back()->withErrors(['code' => 'Kode OTP tidak sesuai.']);
        }

        if ($user->verification_code_expires_at && $user->verification_code_expires_at->isPast()) {
            return back()->withErrors(['code' => 'Kode OTP sudah kadaluarsa. Silakan minta kode OTP baru.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'verification_code' => null,
            'verification_code_expires_at' => null,
        ]);

        session()->forget('reset_email');

        return redirect()->route('login')->with('success', 'Password Anda berhasil diperbarui. Silakan login dengan password baru.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }

    private function homeRoute(): string
    {
        return Auth::user()->role === 'admin'
            ? route('admin.dashboard')
            : route('masyarakat.dashboard');
    }
}
