<template lang="">

         <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a href="#"
                            class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="#"
                            class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium">{{ pagination.current_page }}</span>
                                to
                                <span class="font-medium">{{ pagination.to }}</span>
                                of
                                <span class="font-medium">{{ pagination.total }}</span>
                                Resultados
                            </p>
                        </div>
                        <div>
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            
                                <template v-for="(link, key) in pagination.links">
                                
                                    <div :id="key" v-if="link.url == null" class="relative z-10 inline-flex items-center borderborder-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex" v-html="link.label"></div>

                                    <Link 
                                    :id="'link-' + key" 
                                    v-else :href="link.url" 
                                    class="bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex" 
                                   :class="link.active ? 'border-indigo-500 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20' : 'noactivo'"
                                    v-html="link.label"
                                    
                                    />
                                </template> 
                            </nav>
                    </div>
                 </div>
        </div>

</template>


<script>
import { Link } from '@inertiajs/inertia-vue3';


export default {


    components: {
        Link,
    },


    props: {
        pagination: Object,
    },

}
</script>



<style lang="">
    
</style>


