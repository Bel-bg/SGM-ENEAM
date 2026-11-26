<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Invitation Administration - SGM ENEAM</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; padding: 24px; color: #3a4352;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 540px; margin: 0 auto; background: #ffffff; border: 1px solid #e9ecf7; border-radius: 8px; padding: 32px;">
        <tr>
            <td>
                <h2 style="margin: 0 0 16px; color: #2342ae; font-size: 20px;">[SGM] - ENEAM</h2>
                <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.5;">
                    Bonjour,
                </p>
                <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.5;">
                    Vous avez été invité(e) à rejoindre l'espace administration du <strong>Système de Gestion des Mémoires de l'ENEAM</strong> en tant que :
                </p>
                <div style="background-color: #f1f5f9; border-left: 4px solid #2a52c0; padding: 12px 16px; margin-bottom: 24px; font-weight: bold; color: #1e293b;">
                    {{ $roleLabel }}
                    @if($invite->filiere)
                        — Filière : {{ $invite->filiere->nom ?? $invite->filiere->libelle ?? '' }}
                    @endif
                </div>
                <p style="margin: 0 0 24px; font-size: 15px; line-height: 1.5;">
                    Cliquez sur le bouton ci-dessous pour finaliser la création de votre compte (renseigner votre nom, prénom et définir votre mot de passe) :
                </p>
                <div style="text-align: center; margin-bottom: 24px;">
                    <a href="{{ $urlInscription }}" style="display: inline-block; background-color: #2a52c0; color: #ffffff; text-decoration: none; font-weight: bold; padding: 12px 24px; border-radius: 6px; font-size: 14px;">
                        Créer mon compte
                    </a>
                </div>
                <p style="margin: 0; font-size: 12px; color: #64738a;">
                    Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :<br>
                    <a href="{{ $urlInscription }}" style="color: #2a52c0;">{{ $urlInscription }}</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
