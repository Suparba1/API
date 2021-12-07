<template>
    <div>
        <h1>Form Tambah</h1>
        <div class="row">
            <div class="col">
                <div class="card p-4">
                    <form @submit.prevent="saveData">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input v-model="datas.nama" type="text" class="form-control" id="name" />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input v-model="datas.email" type="email" class="form-control" id="email" />
                        </div>

                        <div class="mb-3">
                            <label for="telp" class="form-label">Telepon</label>
                            <input v-model="datas.no_telp" type="number" class="form-control" id="telp" />
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input v-model="datas.alamat" type="text" class="form-control" id="alamat" />
                        </div>

                        <button class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            datas: {
                nama: null,
                email: null,
                no_telp: null,
                alamat: null,
            },
            errors: {},
            invalid: false,
        };
    },
    mounted() {
        // if (this.$route.params.id) {
        //     this.axios.get("/api/angkatan/" + this.$route.params.id).then((response) => {
        //         this.datas.nama = response.data.data.nama;
        //         this.datas.email = response.data.data.tahun;
        //         this.datas.no_telp = response.data.data.tahun;
        //         this.datas.alamat = response.data.data.tahun;
        //     });
        // }
    },
    methods: {
        saveData: function (e) {
            e.preventDefault();
            if (this.$route.params.id) {
                // axios
                //     .put("/api/angkatan/" + this.$route.params.id, this.datas)
                //     .then((response) => {
                //         this.$swal.fire({ title: "Success!", text: response.data.message, icon: "success", timer: 1000 });
                //         this.$router.push({ name: "angkatan" });
                //     })
                //     .catch((error) => {
                //         this.errors = error.response.data;
                //         this.invalid = true;
                //     });
            } else {
                axios
                    .post("/api/pelanggan", this.datas)
                    .then((response) => {
                        this.$swal.fire({ title: "Success!", text: response.data.message, icon: "success", timer: 1000 });
                        this.$router.push({ name: "pelanggan" });
                    })
                    .catch((error) => {
                        this.errors = error.response.data;
                        this.invalid = true;
                    });
            }
        },
    },
};
</script>