/**
* User: Sreng-S
* Date: 4/7/18
* Time: 9:38 PM
*/

<!DOCTYPE html>
<html>
<head>
  <title>Crud trial</title>
  <link href="/css/lib.css" rel="stylesheet">
</head>
<body>
<h1>Welcome to Library</h1>
<h2>Index of Books</h2>
<table>
  <th>No</th>
  <th>Book Title</th>
  <th>ISBN</th>
  <th>Author</th>
  <th>Category</th>
  <th>Action</th>
  <tbody>

  @foreach ($all as $i => $crud)
    <tr>
      <td>{{ $i+1 }}</td>
      <td>{{ $crud{'title'} }}</td>
      <td>{{ isset( $crud{'isbn'} ) ?  $crud{'isbn'} : ' - ' }}</td>
      <td>{{ $crud{'author'} }}</td>
      <td>{{ $crud{'category'} }}</td>
      <td>
        <form action="/books/{{ $crud{'_id'} }}" method="POST">
          {{ csrf_field() }}
          <input type="button" class="book-action" value="View"
                 onclick="window.location ='{{ route('books.show', ['book' => $crud{'_id'}]) }}'">
          <input type="button" class="book-action" value="Edit"
                 onclick="window.location ='{{ route('books.edit', ['book' => $crud{'_id'}]) }}'">
          <input type="hidden" class="book-action" name="_method" value="DELETE"/>
          <input type="submit" class="book-action" name="del" value="Delete"/>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<hr/>

<input type="button" class="book-action big" value="Add a Book"
       onclick="window.location ='{{ route('crud.create') }}'">
</body>
</html>