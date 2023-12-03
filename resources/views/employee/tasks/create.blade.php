@extends('template.system')

@section('title', 'Buat Tugas Baru - E-Learning Cakrawala (' . $room->name . ')')

@section('css')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
@endsection

@section('tugas', 'nav-active')

@section('container')
    <div class="flex-column container" id="container">
        <div class="flex-row container-row">
            <form action="{{route('taskCreate', $room->id)}}" method="POST" class="flex-column container-form">
                @csrf
                <div class="flex-column form-title">
                    <h3 class="poppins">Buat Tugas Baru Kelas {{$room->name}}</h3>
                    <p class="montserrat">Isilah dengan teliti pada data-data di bawah ini!</p>
                </div>
                @if ($errors->any())
                <div class="notif-warning flex-row montserrat">
                    <img src="{{asset('img/icon/notif-warning.svg')}}" alt="warning image">
                    @if ($errors->has('name','type','release','deadline','description'))
                        <span>Silahkan isi semua data yang diperlukan terlebih dahulu!</span>
                    @elseif ($errors->has('type'))
                        @error('type')
                            <span>Silahkan pilih type tugas yang akan dibuat!</span>
                        @enderror
                    @elseif ($errors->has('release'))
                        @error('release')
                            <span>{{$message}}</span>
                        @enderror
                    @elseif ($errors->has('deadline'))
                        @error('deadline')
                            <span>{{$message}}</span>
                        @enderror
                    @else
                        <span>Silahkan isi semua data yang diperlukan terlebih dahulu!</span>
                    @endif
                </div>
                @endif
                @if (session('warning'))
                <div class="notif-warning flex-row montserrat">
                    <img src="{{asset('img/icon/notif-warning.svg')}}" alt="warning image">
                    <span>{{ session('warning') }}</span>
                </div>
                @endif
                <div class="flex-column form-input">
                    <div class="formel" id="input-star">
                        <input type="text" name="name" id="name" placeholder="Judul tugas" value="{{old('name')}}">
                    </div>
                    <div class="formel" id="input-3dots">
                        <select name="type" id="type">
                            <option disabled {{old('type') == null ? 'selected' : ''}}>Tipe Tugas</option>
                            <option {{old('type') == 'Online Teks' ? 'selected' : ''}} value="Online Teks">Online Teks</option>
                            <option {{old('type') == 'Upload File' ? 'selected' : ''}} value="Upload File">Upload File</option>
                            <option {{old('type') == 'Keduanya' ? 'selected' : ''}} value="Keduanya">Keduanya</option>
                        </select>
                    </div>
                    <div class="formel flex-row">
                        <div class="formel" id="input-date">
                            @if (old('release') == null)
                                <input type="text" onfocus="(this.type='datetime-local')" name="release" id="release" placeholder="Tanggal dibuka" min="{{str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))}}">
                            @else
                                <input type="datetime-local" name="release" id="release" placeholder="Tanggal dibuka" value="{{old('release')}}" min="{{str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))}}">
                            @endif
                        </div>
                        <div class="formel" id="input-date">
                            @if (old('deadline') == null)
                                <input type="text" onfocus="(this.type='datetime-local')" name="deadline" id="deadline" placeholder="Tanggal ditutup" min="{{str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))}}">
                            @else
                                <input type="datetime-local" name="deadline" id="deadline" placeholder="Tanggal ditutup" value="{{old('deadline')}}" min="{{str_replace(' ','T', \Carbon\Carbon::now()->format('Y-m-d H:i'))}}">
                            @endif
                        </div>
                    </div>
                    <div class="formel" id="input-edit">
                        <textarea name="description" id="description" placeholder="Deskripsi tugas" cols="30" rows="10">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="formel small-btn-submit">
                    <button type="submit" class="poppins">Buat Tugas</button>
                </div>
            </form>
            <div class="container-illust">
                <img class="illust-center" src="{{asset('img/illust-tugas.svg')}}" alt="">
            </div>
        </div>
    </div>
@endsection