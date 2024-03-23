<!-- resources/views/letter_combinations.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letter Combinations</title>
</head>
<style>
        .keypad {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 5px;
            max-width: 300px;
            margin: 0 auto;
        }

        .key {
            padding: 20px;
            background-color: #f0f0f0;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .key:hover {
            background-color: #dcdcdc;
        }
    </style>
<body>
    <center>
    <h1>Letter Combinations</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    <form action="/letter-combinations" method="POST" onsubmit="return validateDigits()">
        @csrf <!-- CSRF Protection -->
        <label for="digits">Enter digits:</label>
        <input type="text" id="digits" name="digits" maxlength="10" required pattern="[0-9]+" title="Please enter only numbers"> 
        <button type="submit">Enter</button>
        <br>
    </form>
    </center>
    <script>
        function validateDigits() {
            var digitsInput = document.getElementById('digits').value;
            if (!/^\d+$/.test(digitsInput)) {
                alert('Please enter only numbers in the digits field.');
                return false;
            }
            return true;
        }
    </script>
    <br>
    <div class="keypad">
        @for ($i = 1; $i <= 9; $i++)
            <div class="key" onclick="addNumber('{{ $i }}')">{{ $i }}</div>
        @endfor
        <div class="key" onclick="addNumber('*')"> *</div>
        <div class="key" onclick="addNumber('0')"> 0</div>
        <div class="key" onclick="addNumber('#')"> #</div>
    </div>

    <script>
        function addNumber(number) {
            var phoneNumberField = document.getElementById('digits');
            phoneNumberField.value += number;
        }
    </script>
 
</body>
</html>
