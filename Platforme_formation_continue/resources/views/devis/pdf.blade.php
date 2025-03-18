<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Devis OFPPT</title>
    <style>
        @page {
            margin: 10mm;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: white;
            color: #2d3748;
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #d1d5db;
        }
        .header-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .logo {
            width: 16rem;
            margin-bottom: 0.5rem;
        }
        .company-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2d3748;
        }
        .company-description {
            font-size: 1rem;
            color: #4a5568;
        }
        .title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2563eb;
            text-align: center;
            margin: 1.5rem 0;
        }
        .info-box {
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            padding: 1rem;
            margin-bottom: 1.25rem;
            border-radius: 0.25rem;
        }
        .box-title {
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 0.75rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #d1d5db;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        @media (min-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        .info-item {
            display: flex;
        }
        .info-label {
            width: 9rem;
            font-weight: 600;
        }
        .info-value {
            flex: 1;
            border-bottom: 1px solid #d1d5db;
            padding: 0 0.25rem;
        }
        .document-info {
            display: flex;
            justify-content: space-between;
        }
        .document-info-item {
            font-weight: 600;
        }
        table {
            width: 100%;
            margin-bottom: 1.25rem;
            border-collapse: collapse;
        }
        th {
            border: 1px solid #d1d5db;
            background-color: #2563eb;
            color: white;
            padding: 0.5rem;
            text-align: left;
        }
        th:first-child {
            width: 60%;
        }
        th:nth-child(2) {
            width: 25%;
        }
        th:last-child {
            width: 15%;
            text-align: center;
        }
        td {
            border: 1px solid #d1d5db;
            padding: 0.5rem;
        }
        td:last-child {
            text-align: center;
        }
        .total-row {
            font-weight: 700;
            background-color: #f3f4f6;
        }
        .conditions {
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 0.25rem;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 3rem;
        }
        .signature-box {
            width: 41.666667%;
            border-top: 1px solid #1a202c;
            padding-top: 0.5rem;
            text-align: center;
        }
        .signature-name {
            font-size: 0.875rem;
        }
        .footer {
            text-align: center;
            font-size: 0.75rem;
            color: #718096;
            margin-top: 3rem;
            padding-top: 0.75rem;
            border-top: 1px solid #d1d5db;
        }
    </style>
</head>
<body>
    <!-- Access user directly from auth -->
    @php
        $user = auth()->user();
    @endphp

    <!-- Header with OFPPT Logo -->
    <div class="header">
        <div class="header-content">
            <img src="{{ asset('path/to/ofppt-logo.png') }}" alt="OFPPT Logo" class="logo">
            <div class="company-name">OFPPT</div>
            <div class="company-description">l'Office de la formation professionnelle et de la promotion du Travail</div>
        </div>
    </div>
    
    <div class="title">DEVIS DE FORMATION</div>
    
    <!-- User Information Box -->
    <div class="info-box">
        <div class="box-title">Informations du Demandeur</div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nom:</div>
                <div class="info-value">{{ $user->nom ?? '' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Prénom:</div>
                <div class="info-value">{{ $user->prenom ?? '' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Téléphone:</div>
                <div class="info-value">{{ $user->phone ?? '' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $user->email ?? '' }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Type:</div>
                <div class="info-value">{{ ucfirst($user->status ?? '') }}</div>
            </div>
        </div>
    </div>
    
    <!-- Document Info Box -->
    <div class="info-box">
        <div class="document-info">
            <div><span class="document-info-item">Date:</span> {{ $date }}</div>
            <div><span class="document-info-item">Référence:</span> {{ $reference }}</div>
        </div>
    </div>
    
    <!-- Formations Table -->
    <div class="box-title">Formations Sélectionnées</div>
    
    <table>
        <thead>
            <tr>
                <th>Formation</th>
                <th>Établissement</th>
                <th>Participants</th>
            </tr>
        </thead>
        <tbody>
            @php $totalParticipants = 0; @endphp
            
            @foreach($formations as $formation)
                @php $totalParticipants += $formation['participants']; @endphp
                <tr>
                    <td>{{ $formation['formation_name'] }}</td>
                    <td>{{ $formation['etablissement'] }}</td>
                    <td>{{ $formation['participants'] }}</td>
                </tr>
            @endforeach
            
            <tr class="total-row">
                <td colspan="2"><strong>Total Participants</strong></td>
                <td>{{ $totalParticipants }}</td>
            </tr>
        </tbody>
    </table>
    
    <!-- Conditions Box -->
    <div class="conditions">
        <div class="box-title">Conditions de l'offre</div>
        <p style="margin-bottom: 0.5rem;">Ce devis est valable pour une durée de 30 jours à compter de sa date d'émission.</p>
        <p>Pour plus d'informations ou pour confirmer ce devis, veuillez nous contacter.</p>
    </div>
    
    <!-- Signature Section -->
    <div class="signature-section">
        <div class="signature-box">
            <p>Signature du demandeur</p>
            <p class="signature-name">{{ ($user->prenom ?? '') . ' ' . ($user->nom ?? '') }}</p>
        </div>
        <div class="signature-box">
            <p>Signature du responsable OFPPT</p>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
        <p>OFPPT - l'Office de la formation professionnelle et de la promotion du Travail</p>
        <p>Adresse: 123 Avenue de la Formation, Casablanca - Téléphone: 05-XX-XX-XX-XX - Email: contact@ofppt.ma</p>
    </div>
</body>
</html>