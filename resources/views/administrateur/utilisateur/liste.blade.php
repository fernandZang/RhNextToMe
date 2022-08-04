@extends('administrateur.layouts.backend-dashboard.app')
@section('title','SINES')

@section('content')

<link rel="stylesheet" href="{{ asset('dataTables/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/daTable.marck.min.css') }}">


<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('dataTables/js/jquery.dataTables.min.js')}}" defer></script>
<script src="{{asset('js/datatables.mark.min.js')}}" ></script>
<script src="{{asset('js/tableToExcel.js')}}"></script>


<div class="col-md-12 ">
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('success') }}
        </div>
    @elseif (\Session::has('warning'))
        <div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('warning') }}
        </div>
    @elseif (\Session::has('danger'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('danger') }}
        </div>
    @endif
    <div class="col-md-11 p-0 ml-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-blue-500 text-center text-bold">{{ __('Liste des utilisateurs') }}</div>

                    <div class="card-body">
                        <div >
                            <button class="btn btn-primary m-3" id="toExcel">exporter en Excel</button>
                        </div>
                        <div class="responsive table-responsive m-0 mr-5 mt-5 w-100 " >
                            <table class='border text-center w-100'  id="example" data-cols-width="20,60,20,25">
                                <caption>liste des utilisateur</caption>
                                <thead data-b-a-c="00000000" >
                                    <tr class="border bg-blue-500">
                                        @can('edit-user')
                                            <th data-id='notEditable'  data-exclude ="true" style="width: 100px;" class="m-0 p-0">Actions</th>
                                        @endcan
                                        <th data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-f-bold="true" class="border border-2">Noms  </th>
                                        <th data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-f-bold="true" class="border border-2">Email </th>
                                        <th data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-f-bold="true" class="border border-2">Date enregistrement </th>
                                        <th data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-f-bold="true" class="border border-2">Groupe </th>
                                    </tr>
                                </thead >
                                <tbody>
                                    @php
                                    $nbr=0;
                                    @endphp

                                    @foreach ($users as $user)
                                        @php
                                            $d1=explode(" ", $user->created_at)[0];
                                            $nbr++;
                                        @endphp
                                        <tr class="border text-black">
                                            @can('edit-user')
                                                <td class="" data-exclude ="true">
                                                    <div class="row m-0 p-0">
                                                        <div class="uptpwd col m-0 p-0" id="{{ $user->id }}">
                                                            <button data-toggle="tooltip" title="réinitialiser le mot de passe" class="btn btn-default pd-setting-ed resetpwd" id="{{ $user->id }}" >
                                                                <a href="#">
                                                                    <i class="fas fa-unlock-alt" style="color:rgb(0, 77, 128)" aria-hidden="true"></i>
                                                                </a>
                                                            </button>
                                                        </div>
                                                        <div class="uptbtn col m-0 p-0" id="{{ $user->id }}">
                                                            <button data-toggle="tooltip" title="Modifier" class="btn btn-default pd-setting-ed update" id="{{ $user->id }}" >
                                                                <a href="#">
                                                                    <i class="fa fa-pencil-alt" style="color:green" aria-hidden="true"></i>
                                                                </a>
                                                            </button>
                                                        </div>
                                                        <div class="html col m-0 p-0" id="{{ $user->id }}">
                                                            <button type="button" data-toggle="modal" data-target="#formulaire" class="btn">
                                                                    <i class="fa fa-trash-alt" style="color:red" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <!-- mise a jour user -->
                                                    <div class="modal fade " id="{{ 'uptuser'.$user->id }}">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content card card-default">
                                                                <div class="modal-header card-header text-center" style="background-color: rgb(105, 195, 247)">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i>&nbsp;Confirmation de
                                                                        Suppression de la Requête/Plainte</h5>
                                                                    <button type="button" class="close fermer_modal" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('user.upt',$user) }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="del_form">
                                                                            <input type="text" class="form-control" id="" name="{{ 'user_id' }}" hidden  value="{{ $user->id }}">

                                                                            <div class="form-group row">
                                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                                                                    @error('name')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                                                                    @error('email')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group row">

                                                                                <div class="col-md-6">
                                                                                    @foreach ($roles as $role)
                                                                                        <label for="{{ $role->nom }}" class="col-md-4 col-form-label text-md-right">{{$role->nom }}</label>
                                                                                        <input id="{{ $role->nom }}" type="checkbox"  name="role[]" value="{{ $role->id }}"
                                                                                            @foreach ($user->roles as $userRole)
                                                                                                @if ($userRole->id===$role->id)
                                                                                                    checked
                                                                                                @endif
                                                                                            @endforeach
                                                                                        >
                                                                                    @endforeach

                                                                                    @error('email')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                    </div><br/>
                                                                    <hr>
                                                                    <div class=" col-md-12">
                                                                        <div class="col-sm-12 text-center pull-left"><br /><br />
                                                                            <button type="button" class="btn btn-primary fermer_modal"
                                                                                data-dismiss="modal">Annuler</button>
                                                                            &nbsp; &nbsp;&nbsp; &nbsp;
                                                                            <button type="submit" class="btn btn-success upt">Enregistrer</button>
                                                                            &nbsp; &nbsp;
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- suppresion user -->
                                                    <div class="modal fade " id="{{ 'deluser'.$user->id }}">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content card card-default">
                                                                <div class="modal-header card-header text-center" style="background-color: rgb(247, 105, 105)">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i>&nbsp;Confirmation de
                                                                        Suppression de la Requête/Plainte</h5>
                                                                    <button type="button" class="close fermer_modal" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('user.del') }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="del_form">
                                                                            <input type="text" class="form-control" id="" name="{{ 'user_id' }}" hidden  value="{{ $user->id }}">
                                                                            <label for="">voulez vous vraiment supprimer ?</label>
                                                                        </div>
                                                                    </div><br/>
                                                                    <hr>
                                                                    <div class=" col-md-12">
                                                                        <div class="col-sm-12 text-center pull-left"><br /><br />
                                                                            <button type="button" class="btn btn-primary fermer_modal"
                                                                                data-dismiss="modal">Annuler</button>
                                                                            &nbsp; &nbsp;&nbsp; &nbsp;
                                                                            <button type="submit" class="btn btn-danger sup">Supprimer</button>
                                                                            &nbsp; &nbsp;
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- reinitialiser le mot de passe -->
                                                    <div class="modal fade " id="{{ 'upt_pwd_reset'.$user->id }}">
                                                        <div class="modal-dialog modal-lg " role="document">
                                                            <div class="modal-content card card-default">
                                                                <div class="modal-header card-header text-center bg-primary">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i>&nbsp;Confirmation de
                                                                        réinitialisation du mot de passe</h5>
                                                                    <button type="button" class="close fermer_modal" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('user.reset.pwd') }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="del_form">
                                                                            <input type="text" class="form-control" id="" name="{{ 'user_id' }}" hidden  value="{{ $user->id }}">
                                                                            <label for="">voulez vous vraiment réinitialisation du mot de passe de {{ $user->name }} ?</label>
                                                                        </div>
                                                                    </div><br/>
                                                                    <hr>
                                                                    <div class=" col-md-12">
                                                                        <div class="col-sm-12 text-center pull-left"><br /><br />
                                                                            <button type="button" class="btn btn-primary fermer_modal"
                                                                                data-dismiss="modal">Annuler</button>
                                                                            &nbsp; &nbsp;&nbsp; &nbsp;
                                                                            <button type="submit" class="btn btn-success sup">confirmer</button>
                                                                            &nbsp; &nbsp;
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>







                                                    </div>
                                                </td>
                                            @endcan
                                            <td class="border border-2 border-black" data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-a-wrap="true">{{ $user->name }}</td>
                                            <td class="border border-2 border-black" data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-a-wrap="true">{{ $user->email }}</td>
                                            <td class="border border-2 border-black" data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-a-wrap="true">{{ $d1 }}</td>
                                            <td class="border border-2 border-black" data-b-a-s="thin" data-b-a-c="00000000" data-a-h="center" data-a-v="middle" data-a-wrap="true">{{ implode(', ',$user->roles()->get()->pluck('nom')->toArray()) }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var new_row = $("<tr class='search-header'/>");
    $('#example thead th').each(function(i) {
        var etat = $(this).attr('data-id');
        if (etat != "notEditable") {
            var title = $(this).text();
            var new_th = $('<th style="' + $(this).attr('style') + '" />');
            $(new_th).append('<input type="text" placeholder="recherche ' + title +
                '" data-index="' + i + '">');
            $(new_row).append(new_th);
            $('#example thead').prepend(new_row);
        } else {
            var title = $(this).text();
            var new_th = $('<th style="' + $(this).attr('style') + '" />');
            $(new_th).append('');
            $(new_row).append(new_th);
            $('#example thead').prepend(new_row);
        }
    });
    $(document).ready(function() {

        $('.html').click(function(){
            var ide=$(this).attr('id');
            //alert(ide);
            $('#deluser'+ide).modal('show');
        })
        $('.uptbtn').click(function(){
            var ide=$(this).attr('id');
            //alert(ide);
            $('#uptuser'+ide).modal('show');
        })
        $('.uptpwd').click(function(){
            var ide=$(this).attr('id');
            //alert(ide);
            $('#upt_pwd_reset'+ide).modal('show');
        })
         //fermer un modal
         $(document).on('click', '.fermer_modal', function() {
            $('.modal').modal('hide');
        })

        $.extend(true, $.fn.dataTable.defaults, {
            mark: true
        });
        var table=$('#example').DataTable({

            paging: false,
            sort: true,
            scrollX: true,
            searching: true,

        });



        $(table.table().container()).on('keyup', 'thead input', function () {
            table.column($(this).data('index')).search(this.value).draw();
        });

    });
</script>
<script>
    function exportExcel() {
        TableToExcel.convert(document.getElementById('simpleTable1'));
    }

    var button = document.querySelector('#toExcel');
    button.addEventListener('click', function (e) {
        var table = document.querySelector('#example');
        TableToExcel.convert(table,{
            name:'listes des utilisateurs.xlsx',
            sheet:{
                name:'listes des utilisateurs'
            }
        });

    });
</script>
@endsection
