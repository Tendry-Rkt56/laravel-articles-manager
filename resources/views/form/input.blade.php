<?php

$type = $type ?? 'text';
$placeholder = $placeholder ?? '';

?>

<div class="container">
    <div class="container d-flex align-items-center justify-content-center flex-row">
        <label style="width:20%" class="fw-bolder" placeholder="{{$placeholder}}" for="{{$name}}">{{$label}}:</label>
        <input style="width:80%" type="{{$type}}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{old($name, $article->$name)}}" id="{{$name}}" class="form-control @error($name) is-invalid @enderror">
    </div>
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
