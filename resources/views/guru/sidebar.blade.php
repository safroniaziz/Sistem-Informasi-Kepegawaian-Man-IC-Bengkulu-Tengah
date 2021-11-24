<li>
    <a href=" {{ route('guru.dashboard') }} "><i class="fa fa-home"></i>Dashboard</a>
</li>

<li>
    <a href=" {{ route('guru.personal') }} "><i class="fa fa-home"></i>Data Personal</a>
</li>

<li>
    <a href=" {{ route('guru.pendidikan') }} "><i class="fa fa-home"></i>Riwayat Pendidikan</a>
</li>

<li>
    <a href=" {{ route('guru.kepangkatan') }} "><i class="fa fa-home"></i>Riwayat Kepangkatan</a>
</li>

<li>
    <a href=" {{ route('guru.jabatan_fungsional') }} "><i class="fa fa-home"></i>Jabatan Fungsional</a>
</li>

<li>
    <a href=" {{ route('guru.tugas_tambahan') }} "><i class="fa fa-home"></i>Tugas Tambahan</a>
</li>

<li>
    <a href=" {{ route('guru.data_keluarga') }} "><i class="fa fa-home"></i>Data Keluarga</a>
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
