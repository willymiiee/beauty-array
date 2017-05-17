<h2>Selamat datang di BeautyArray, {{ $user->name }} !</h2>

<p>Silahkan aktivasi akun anda dengan cara klik <i>link</i> di bawah </p>

<a href="{{ url('activate?code=' . $user->activation_code) }}">
    {{ url('activate?code=' . $user->activation_code) }}
</a>

<p>Terima kasih !</p>