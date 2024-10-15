<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat de Travail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .contract {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(to right, #ff7f50, #ff4500);
            padding: 30px;
            text-align: center;
            color: white;
            position: relative;
            border-radius: 10px 10px 0 0;
        }
        .header:before {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            width: 200%;
            height: 100px;
            background: inherit;
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: -1;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .details {
            padding: 20px;
            line-height: 1.6;
            color: #333;
        }
        .details p {
            margin: 10px 0;
        }
        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .signature div {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 10px;
        }
        .download-button {
            text-align: center;
            margin: 20px 0;
        }
        .download-button a {
            padding: 10px 20px;
            background-color: #ff4500;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .download-button a:hover {
            background-color: #ff7f50;
        }
    </style>
</head>
<body>
    <div class="contract">
       
        <div class="header">
        <div class="download-button">
       
            <h2>Contrat de Travail</h2>
        </div>
        <div class="details">
            <p><strong>Nom:</strong> {{ $employee['nom'] }}</p>
            <p><strong>Prénom:</strong> {{ $employee['prenom'] }}</p>
            <p><strong>Profession:</strong> {{ $employee['profession'] }}</p>
            
            <p><strong>Date de début de contrat:</strong> {{ $contrats[0]['date_debut_contrat'] }}</p>
            <p><strong>Date de fin de contrat:</strong> {{ $contrats[0]['date_fin_contrat'] }}</p>
            <p><strong>Type de contrat:</strong> {{ $contrats[0]['type_contrat'] }}</p>
            <p><strong>Salaire:</strong> {{ $contrats[0]['salaire'] }} FCFA</p>
            
        </div>
        <p>Fait à Libreville, le {{ $contrats[0]['date_fin_contrat'] }}</p>
        <div class="signature">
            <div>
                <p>Signature de l'employeur</p>
            </div>
            <div>
                <p>Signature de l'employé</p>
            </div>
        </div>
    </div>
</body>
</html>