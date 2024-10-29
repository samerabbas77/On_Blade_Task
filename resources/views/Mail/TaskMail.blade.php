
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samer's Jop</title>
</head>
<body>
    <h1> Hi <strong> {{$user->name}} </strong></h1>
    <p> You have this Pending Tasks and  That You had to finshed today : </p>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Status</th>
        </tr>
        @foreach ($tasks as $task) 
            <tr>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->due_date}}</td>
                <td>{{$task->status}}</td>
            </tr>
        @endforeach    
    </table>
</body>
</html>