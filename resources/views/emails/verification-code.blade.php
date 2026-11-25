<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Code de vérification - SGM ENEAM</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; padding: 24px; color: #3a4352;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 520px; margin: 0 auto; background: #ffffff; border: 1px solid #e9ecf7; border-radius: 8px; padding: 32px;">
        <tr>
            <td>
                <h2 style="margin: 0 0 16px; color: #2342ae; font-size: 20px;">SGM - ENEAM</h2>
                <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.5;">
                    Bonjour <strong>{{ $etudiant->prenom }} {{ $etudiant->name }}</strong>,
                </p>
                <p style="margin: 0 0 24px; font-size: 15px; line-height: 1.5;">
                    Voici votre code de vérification à 6 chiffres pour accéder à la plateforme de gestion des mémoires :
                </p>
                <div style="background-color: #f9fafb; border: 1px dashed #2a52c0; border-radius: 6px; padding: 16px; text-align: center; margin-bottom: 24px;">
                    <span style="font-size: 28px; font-weight: bold; letter-spacing: 6px; color: #242d3a;">
                        {{ $code }}
                    </span>
                </div>
                <p style="margin: 0; font-size: 13px; color: #64738a;">
                    Ce code est valable pendant 10 minutes. Si vous n'êtes pas à l'origine de cette demande, ignorez cet e-mail.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
