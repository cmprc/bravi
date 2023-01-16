<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bravi</title>

  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
</head>

<body>
  <form action="/" method="get" id="validation-form">
    <input type="text" name="text">
    <button>Validar</button>
  </form>

  <p class="result"></p>

  <script>
    function isValid(text) {

      let array = [];

      for (let i = 0; i < text.length; i++) {
        let x = text[i];

        if (x == '(' || x == '[' || x == '{') {
          array.push(x);
          continue;
        }

        if (array.length == 0)
          return false;

        let aux;
        switch (x) {
          case ')':
            aux = array.pop();
            if (aux == '{' || aux == '[')
              return false;
            break;

          case '}':
            aux = array.pop();
            if (aux == '(' || aux == '[')
              return false;
            break;

          case ']':
            aux = array.pop();
            if (aux == '(' || aux == '{')
              return false;
            break;
        }
      }

      return (array.length == 0);
    }

    $('#validation-form').on('submit', function(e) {
      e.preventDefault();

      let input = $(this).find('input').val();
      let response = isValid(input);

      if (response) {
        $('.result').html('É válido');
      } else {
        $('.result').html('Não é válido');
      }
    });
  </script>
</body>

</html>