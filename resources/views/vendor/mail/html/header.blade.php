<tr>
<td class="header mail-bg">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('storage/images/logo_footer.png')}}" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
