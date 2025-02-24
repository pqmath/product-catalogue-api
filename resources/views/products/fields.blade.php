<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'required', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Preco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco', 'Preco:') !!}
    {!! Form::number('preco', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Quantidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    {!! Form::number('quantidade', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria', 'Categoria:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required']) !!}
</div>
