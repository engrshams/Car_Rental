<!DOCTYPE html>
<html>
<head>
  <style>
    body { font-family: Arial, sans-serif; color: #333; }
    .container { padding: 20px; border: 1px solid #ccc; background: #f9f9f9; }
    .logo { width: 150px; }
    .header { text-align: center; margin-bottom: 20px; }
    .message { line-height: 1.6; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      {{-- <img src="{{ asset('images/logo.png') }}" alt="Car Rental Logo" class="logo" /> --}}
      <img src="{{ url('images/logo.png') }}" alt="Car Rental Logo" class="logo" />
      <h2>New Contact Message</h2>
    </div>
    <div class="message">
      <p><strong>Name:</strong> {{ $data['name'] }}</p>
      <p><strong>Email:</strong> {{ $data['email'] }}</p>
      <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
      <p><strong>Message:</strong><br>{{ $data['message'] }}</p>
    </div>
  </div>
</body>
</html>
