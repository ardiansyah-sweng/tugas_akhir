@component('mail::message')
<p>
{{ $data['email'] }}

Ini adalah kode OTP Anda: <b>{{ $data['otpCode'] }}</b>.
<br>
Silakan gunakan untuk login ke Simtakhir.

Thanks,<br>
Admin {{ config('app.name') }}
@endcomponent
