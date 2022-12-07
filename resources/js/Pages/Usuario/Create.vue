<template>
    <AppLayout title="Crear Usuario">
        <template #header>
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        </template>

        <div class="py-12">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3">
                Crear / Usuario
            </h1>
        </div>

        <div class="bg-white px-6 py-8 rounded-lg shadow">

          <!--   {{ this.$page.props.errors }} -->
         <jet-validation-errors/>
            <div class="grid grid-cols-2 grap-6">
                <div class="mb-5">
                    <input v-model="usuario.name" type="text" name="name"  placeholder="Nombre"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <input v-model="usuario.email" type="email" name="email"  placeholder="Correo electrónico"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <input v-model="usuario.nombre_completo" type="text" name="nombre_completo"  placeholder="Nombre Completo"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <input v-model="usuario.password" type="password" name="password"  placeholder="Contraseña"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            </div>

            <div class="flex justify-end">
                <button @click="store"
                    class="hover:shadow-form rounded-md bg-green-400 py-3 px-8 text-base font-semibold text-white outline-none">
                    Crear
                </button>
            </div>



        </div>


    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

export default {

    components: {
        AppLayout,
        JetValidationErrors,
    },
    data(){
        return {
         usuario: {
            name: '',
            email: '',
            nombre_completo: '',
            password:'',

         }
        }
    },
    methods: {
        store(){
            this.$inertia.post(this.route('usuarios.store'), this.usuario)
        }
    }

};
</script>

