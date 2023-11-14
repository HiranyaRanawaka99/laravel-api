<!DOCTYPE html>
<html lang="en">
<style> 
    body {
        background: lightblue;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<body>
    
    <p> E' stato {{$project->published ? 'pubblicato un nuovo ': 'rimosso questo '}} progetto </p>

</body>
</html>