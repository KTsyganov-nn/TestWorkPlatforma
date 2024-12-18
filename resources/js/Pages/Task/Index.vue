<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router, useForm } from '@inertiajs/vue3';


const props = defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
    tasks: Object,
    links:Object,
    auth:Object
});


const create = ()=>{
    route('task.index');
}

</script>

<template>
    <AppLayout title="Задачи">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Задачи
            </h2>
            <Link   class="mx-2 inline-block my-1 bg-green-500 text-white px-10 py-2 rounded-lg"
                :href="route('task.create')"
                >Новая заявка</Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-if="tasks.data.length > 0" class="p-6 flex flex-nowrap  lg:p-8 bg-white border-b border-gray-200">
                        <div class="basis-1/2 font-bold">
                           Что делать
                        </div>
                        <div class="basis-1/2 font-bold">
                            Заказчик
                        </div>
                        <div class="basis-1/2 font-bold">
                            Сроки
                        </div>
                        <div class="basis-1/2">
                        </div>
                    </div>
                    <div v-if="tasks.data.length > 0" v-for="task in tasks.data" :key="task.id" class="p-6 flex flex-nowrap  lg:p-8  bg-white border-b border-gray-200">
                        <div class="basis-1/2">
                            {{task.title}}
                            </div>
                        <div class="basis-1/2">
                            {{task.user_info.name}}
                        </div>
                        <div class="basis-1/2">C {{task.date_start}} <br /> по {{task.date_end}}
                        </div>

                        <div class="basis-1/2 flex flex-wrap">
                            <Link :href="route('task.show', task.id)"
                                  class="mx-2 my-1 bg-gray-500 text-white px-10 py-2 rounded-lg"
                            >
                                Подробнее
                            </Link>
                            <Link v-if="task.user_id == auth.user.id"
                                  :href="route('task.show', task.id)"
                                  class="mx-2 my-1 bg-green-500 text-white px-10 py-2 rounded-lg"
                            >
                                Редактировать
                            </Link>


                        </div>
                    </div>
                    <div v-else class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        Задач не найдено
                    </div>

                    <div class="pagination px-5 py-3">
                        <ul class="flex flex-row justify-evenly">
                            <li v-for="link in links">

                                <Link
                                    :href="link.url"
                                    v-html="link.label"
                                    :disabled="link.url==null"

                                >

                                </Link>


                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
