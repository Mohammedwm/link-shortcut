<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/link.ico') }}">
        <title>Link Shortcut</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>
        <div class="container">
            <br>
            <div class="row">
                <form action="{{ route('create') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="previous_link" class="form-label">Previous Link</label>
                        <input type="text" class="form-control" name="prev_link"
                            placeholder="Previous Link" value="{{ old('prev_link') }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" value="ff">Create Link</button>
                    </div>
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Previous Link</th>
                        <th scope="col">New Link</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($links as $link)
                    <tr>
                        <th scope="row">{{$i++;}}</th>
                        <td>{{$link->prev_link}}</td>
                        <td><a href="{{ route('open',[$link->new_link]) }}" target="_blank">{{config('app.url').$link->new_link}}</a></td>
                        <td><a class="btn btn-sm btn-outline-primary" onclick="CopyText('{{config('app.url').$link->new_link}}')">Copy Link</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script>
            function CopyText(link){
                console.log(link);
                navigator.clipboard.writeText(link);
            }
        </script>
    </body>

</html>
