import Dashboard from './page/Dashboard.vue'
import Pelanggan from './page/Pelanggan.vue'
import Petugas from './page/Petugas.vue'
import FormsPetugas from './page/forms/FormsPetugas.vue'
import FormsPelanggan from './page/forms/FormsPelanggan.vue'

export const routes = [
    {name:'dashboard', path:'/app/dashboard', component: Dashboard},
    {name:'pelanggan', path:'/app/pelanggan', component: Pelanggan},
    {name:'createPelanggan', path:'/app/pelanggan/create', component: FormsPelanggan},
    {name:'editPelanggan', path:'/app/pelanggan/edit/:id', component: FormsPelanggan},
    {name:'petugas', path:'/app/petugas', component: Petugas},
    {name:'createPetugas', path:'/app/petugas/create', component: FormsPetugas},
    {name:'editPetugas', path:'/app/petugas/edit/:id', component: FormsPetugas},
];