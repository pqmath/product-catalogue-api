<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $category->id}}</p>
</div>

<!-- Nome Field -->
<div class="col-sm-12">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{{ $category->nome }}</p>
</div>

<!-- Descricao Field -->
<div class="col-sm-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    <p>{!! $category->descricao !!}</p>
</div>
