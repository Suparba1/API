<template>
    <div>
        <h1>Pelanggan</h1>
        <div class="row">
            <div class="col">
                <div class="card p-4">
                    <div class="mb-2">
                        <router-link :to="{ name: 'createPelanggan' }" class="btn btn-dark">Tambah Data</router-link>
                    </div>
                    <table class="table table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col" class="text-center" width="50">#</th>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Telepon</th>
                                <th scope="col" class="text-center">Alamat</th>
                                <th scope="col" class="text-center" width="200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in pelanggan.data" :key="index">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td class="text-center">{{ item.nama }}</td>
                                <td class="text-center">{{ item.email }}</td>
                                <td class="text-center">{{ item.no_telp }}</td>
                                <td class="text-center">{{ item.alamat }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-warning">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pelanggan: {},
        };
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData: function () {
            axios.get("/api/pelanggan").then((response) => {
                this.pelanggan = response.data;
                console.log(this.pelanggan);
            });
        },
    },
};
</script>