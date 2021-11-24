<li>
    <a href=" {{ route('guru.dashboard') }} "><i class="fa fa-home"></i>Dashboard</a>
</li>

<li>
    <a href=" {{ route('guru.personal') }} "><i class="fa fa-user"></i>Data Personal</a>
</li>

<li>
    <a href=" {{ route('guru.pendidikan') }} "><i class="fa fa-graduation-cap"></i>Riwayat Pendidikan</a>
</li>

<li>
    <a href=" {{ route('guru.kepangkatan') }} "><i class="fa fa-history"></i>Riwayat Kepangkatan</a>
</li>

<li>
    <a href=" {{ route('guru.jabatan_fungsional') }} "><i class="fa fa-briefcase"></i>Jabatan Fungsional</a>
</li>

<li>
    <a href=" {{ route('guru.tugas_tambahan') }} "><i class="fa fa-tasks"></i>Tugas Tambahan</a>
</li>


<li><a><i class="fa fa-users"></i>Data Keluarga <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href="{{ route('guru.istri_atau_suami') }}">Data Istri / Suami</a></li>
        <li><a href="{{ route('guru.data_anak') }}">Data Anak</a></li>
    </ul>
</li>

<li style="padding-left:2px;">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i>{{__('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</li>

@push('styles')
    <style>
        .noclick       {
            pointer-events: none;
            cursor: context-menu;
            background-color: #ed5249;
        }

        .default{
            cursor: default;
        }

        .set_active{
            border-right: 5px solid #1ABB9C;
        }

    </style>
@endpush
