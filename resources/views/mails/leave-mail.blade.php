<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Tracker</title>
</head>
<body>
<div>
    <H5>Hello {{ $employeeLeave->user->name }}</H5>
    <p>Greetings from, <b>Leave Tracker</b></p>
    <p>Your leave request status is updated. Please check.</p>
    <a href="{{ route('employee.leaveRequest.histories') }}">View</a>
    <p>Thank you for being with us.</p>
</div>
</body>
</html>
