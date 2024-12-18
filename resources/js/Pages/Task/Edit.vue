<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextArea from '@/Components/InputTextarea.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({

    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
    task: Object,
    links: Object,
    auth: Object
});

const form = useForm({
    _method: 'PUT',
    title: props.task.data.title,
    description: props.task.data.description,
    date_start: props.task.data.date_start,
    date_end: props.task.data.date_end,
});

const submit = () => {
    props.task.data.description
    form.post(route('task.update', props.task.data.id), {});
};


</script>

<template>
    <AppLayout title="Редактировать задачу">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Редактировать задачу
            </h2>
            <Link
                :href="route('task.index')"
            >Вернуться назад
            </Link>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-10">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="title" value="Название"/>
                                <TextInput
                                    id="title"
                                    v-model="form.title"
                                    type="text"
                                    class="mt-1  w-full"
                                    required

                                    autocomplete="title"
                                />

                                <InputError class="mt-2" :message="form.errors.title"/>
                            </div>

                            <div class="mt-4">
                                <InputLabel for="description" value="Описание"/>


                                <TextArea id="description" v-model="form.description" class="mt-1 block w-full">
                                    {{ task.data.description }}
                                </TextArea>
                                <InputError class="mt-2" :message="form.errors.description"/>
                            </div>

                            <div class="mt-4">
                                <InputLabel for="date_start" value="Дата начала"/>
                                <TextInput
                                    id="date_start"
                                    v-model="form.date_start"
                                    type="datetime-local"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="date_start"
                                    :value="task.data.date_start"
                                />
                                <InputError class="mt-2" :message="form.errors.date_start"/>
                            </div>

                            <div class="mt-4">
                                <InputLabel for="date_end" value="Дата конца"/>
                                <TextInput
                                    id="date_end"
                                    v-model="form.date_end"
                                    type="datetime-local"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="date_end"
                                    :value="task.data.date_end"
                                />
                                <InputError class="mt-2" :message="form.errors.date_end"/>
                            </div>


                            <div class="flex items-center justify-end mt-4">


                                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                               :disabled="form.processing">
                                    Сохранить
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
