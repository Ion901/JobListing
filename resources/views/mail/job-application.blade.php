{{-- resources/views/emails/job-application.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="margin:0; padding:0; background:#f5f5f5; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="padding: 32px 16px;">
            <table width="560" cellpadding="0" cellspacing="0"
                style="background:#ffffff; border-radius:8px; overflow:hidden; border:1px solid #e0e0e0;">

                {{-- Header --}}
                <tr>
                    <td style="background:#1a1a2e; padding:24px 32px;">
                        <p style="font-size:11px; color:#9999bb; margin:0 0 4px; text-transform:uppercase; letter-spacing:0.08em;">
                            JobListing.md
                        </p>
                        <p style="font-size:16px; font-weight:bold; color:#ffffff; margin:0;">
                            Cerere nouă de angajare
                        </p>
                    </td>
                </tr>

                {{-- Body --}}
                <tr>
                    <td style="padding:28px 32px;">

                        <p style="font-size:14px; color:#444; line-height:1.6; margin:0 0 24px;">
                            Bună ziua,<br><br>
                            Un nou candidat a aplicat pentru postul publicat pe platforma noastră.
                        </p>

                        {{-- Candidate card --}}
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="background:#f8f8f8; border-radius:8px; border:1px solid #ebebeb; margin-bottom:24px;">
                            <tr>
                                <td style="padding:20px;">

                                    {{-- Avatar + name --}}
                                    <table width="100%" cellpadding="0" cellspacing="0"
                                        style="margin-bottom:16px; border-bottom:1px solid #e8e8e8; padding-bottom:16px;">
                                        <tr>
                                            <td width="62">
                                                <div style="width:48px; height:48px; border-radius:50%; background:#e6f1fb; text-align:center; line-height:48px; font-weight:bold; font-size:15px; color:#0c447c;">
                                                    {{ strtoupper(substr(explode(' ', $name)[0], 0, 1) . substr(explode(' ', $name)[1] ?? '', 0, 1)) }}
                                                </div>
                                            </td>
                                            <td>
                                                <p style="font-size:16px; font-weight:bold; color:#1a1a1a; margin:0 0 2px;">
                                                    {{ $name }}
                                                </p>
                                                <p style="font-size:12px; color:#888; margin:0;">
                                                    Candidat pentru poziția aplicată : {{ $jobTitle }}
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    {{-- Fields --}}
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="padding:8px 0;" width="50%">
                                                <p style="font-size:11px; color:#999; margin:0 0 2px; text-transform:uppercase;">Prenume</p>
                                                <p style="font-size:14px; color:#1a1a1a; margin:0; font-weight:bold;">
                                                    {{ explode(' ', $name)[0] }}
                                                </p>
                                            </td>
                                            <td style="padding:8px 0;">
                                                <p style="font-size:11px; color:#999; margin:0 0 2px; text-transform:uppercase;">Nume</p>
                                                <p style="font-size:14px; color:#1a1a1a; margin:0; font-weight:bold;">
                                                    {{ explode(' ', $name)[1] ?? '' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding:8px 0; border-top:1px solid #ebebeb;">
                                                <p style="font-size:11px; color:#999; margin:0 0 2px; text-transform:uppercase;">Email</p>
                                                <a href="mailto:{{ $email }}"
                                                    style="font-size:14px; color:#185fa5; font-weight:bold;">
                                                    {{ $email }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding:8px 0; border-top:1px solid #ebebeb;">
                                                <p style="font-size:11px; color:#999; margin:0 0 6px; text-transform:uppercase;">CV Atașat</p>
                                                <p style="font-size:13px; color:#185fa5; background:#e6f1fb; padding:6px 12px; border-radius:6px; font-weight:bold; display:inline-block;">
                                                    {{ basename($cvPath) }}
                                                </p>
                                                <p style="font-size:11px; color:#999; margin:4px 0 0;">
                                                    CV-ul este atașat la acest email.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                        {{-- Notice --}}
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="background:#fffbeb; border:1px solid #fde68a; border-radius:8px; margin-bottom:24px;">
                            <tr>
                                <td style="padding:14px 16px; font-size:13px; color:#633806; line-height:1.6;">
                                    Cererea a fost trimisă pe <strong>{{ $sentAt }}</strong>.
                                    Vă recomandăm să răspundeți în cel mult 5 zile lucrătoare.
                                </td>
                            </tr>
                        </table>

                        {{-- Footer --}}
                        <p style="font-size:12px; color:#aaa; text-align:center; margin:0; border-top:1px solid #ebebeb; padding-top:20px; line-height:1.6;">
                            Email generat automat de <strong>JobListing.md</strong><br>
                            Suport: <a href="mailto:support@joblisting.md" style="color:#185fa5;">support@joblisting.md</a>
                        </p>

                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
