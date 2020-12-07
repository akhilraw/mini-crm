<p>Dear</p>
<p>New Company {{ $companyName }} is arrived. It's email address is <a href="mailto:{{ $companyEmail }}">{{ $companyEmail }}.</a> </p>
<p>To know about it more you can visit to it's official website <a href="{{ $companyWebsite }}">{{ $companyWebsite }}.</a></p>
<br>
Here is company  logo:
<img src="{{ (public_path(str_replace('public', '', $companyLogo))) }}" width="100">
<p><b>Many Regards,</b></p>
<p>AKRDR,</p>
<p>Developer</p>
