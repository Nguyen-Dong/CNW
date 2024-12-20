@extends('layouts.app') 
 
@section('content') 
    <div class="container"> 
        <h1>Chi tiết Task</h1> 
        <p><strong>Tiêu đề:</strong> {{ $issues->title }}</p> 
        <p><strong>Mô tả:</strong> {{ $issues->description }}</p> 
        <p><strong>Mô tả chi tiết:</strong> {{ $issues->long_description }}</p> 
        <p><strong>Trạng thái:</strong> {{ $issues->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</p> 
        <a href="{{ route('issues.index') }}" class="btn btn-secondary">Quay lại</a> 
    </div> 
@endsection 