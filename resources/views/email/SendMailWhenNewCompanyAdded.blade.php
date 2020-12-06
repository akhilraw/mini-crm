<p>Dear</p>
<p>New Company {{ $companyName }} is arrived. It's email address is <a href="mailto:{{ $companyEmail }}">{{ $companyEmail }}.</a> </p>
<p>To know about it more you can visit to it's official website <a href="{{ $companyWebsite }}">{{ $companyWebsite }}.</a></p>
<br>
<img src="{{ asset('storage'.str_replace('public', '', $companyLogo)) }}" alt="company logo" height="100" width="100">
<p><b>Many Regards,</b></p>
<p>AKRDR,</p>
<p>Developer</p>
