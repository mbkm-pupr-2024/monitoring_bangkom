<!DOCTYPE html>
<html>

<head>
  <title>User Profile</title>
</head>

<body>

  <h1>User Profile</h1>


  <h2>Posts</h2>
  <ul>
    <table>
      @foreach($data as $item)
      <tr>
        <td>{{ $item['nama'] }}</td>
        <td>{{ $item['sekolah'] }}</td>
        <td>{{ $item['tanun'] }}</td>
      </tr>
      @endforeach
    </table>
  </ul>

</body>

</html>