
<h1>Hey, {{ $user->username }}</h1>
<h3>Here's your Mail: {{ $user->email }}</h3>
<p>click on given link to verify your email address</p>
<a href="{{ url('user/verify', $user->verifyUser->token) }}">Verify Mail</a>
