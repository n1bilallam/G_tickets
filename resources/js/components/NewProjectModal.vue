<template>
    <modal name="new-project" classes="p-10 bg-white rounded-lg" height="auto">
        <h1 class="font-normal mb-16 text-center text-blue text-2xl">Let’s Know your Problem !</h1>

        <form @submit.prevent="submit">
            <div class="flex">
                <div class="w-full mr-4">
                    <div class="mb-4">
                        <label for="title" class="text-sm block mb-2">Title</label>

                        <input
                            type="text"
                            id="title"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin"
                            :class="form.errors.title ? 'border-error' : 'border-muted-light'"
                            v-model="form.title">

                        <span class="text-xs italic text-red text-error" v-if="form.errors.title" v-text="form.errors.title[0]"></span>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="text-sm block mb-2">Description</label>

                        <textarea
                            id="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin"
                            :class="form.errors.description ? 'border-error' : 'border-muted-light'"
                            rows="7"
                            v-model="form.description"></textarea>

                        <span class="text-xs italic text-red text-error" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
                    </div>
                </div>

            </div>

            <footer class="flex justify-end">
                <button type="button" class="bg-white mr-2 text-blue rounded-lg no-underline text-sm py-2 px-5 is-outlined mr-4" @click="$modal.hide('new-project')">Cancel</button>
                <button class="bg-blue mr-2 text-white rounded-lg no-underline text-sm py-2 px-5">Create Project</button>
            </footer>
        </form>
    </modal>
</template>

<script>
    import G_ticketsForm from './G_ticketsForm';

    export default {
        data() {
            return {
                form: new G_ticketsForm({
                    title: '',
                    description: ''
                })
            };
        },

        methods: {
            async submit() {       
                this.form.submit('/projects')
                    .then(response => location = response.data.message);
            }
        }
    }
</script>