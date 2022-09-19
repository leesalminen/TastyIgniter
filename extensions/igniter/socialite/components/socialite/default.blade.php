@foreach ($socialiteLinks as $name => $link)
    <a
        href="{{ $link."?success={$successPage}&error={$errorPage}" }}"
    >
        <img src="https://developers.google.com/static/identity/images/btn_google_signin_dark_normal_web.png">
</a>
@endforeach