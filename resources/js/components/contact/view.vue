<template>
    <tr>
        <td>{{ id }}</td>
        <td>{{ name | properCase }}</td>
        <td>{{ email }}</td>
        <td>{{ phone }}</td>
        <td>{{ country }}</td>
        <td>{{ city }}</td>
        <td>{{ state }}</td>
        <td>{{ zip }}</td>
        <td><button @click="del">Delete</button></td>
    </tr>
</template>

<script>
    export default {
        methods: {
            update(val) {
                // To do
            },
            del() {
                this.$emit('delete', this.id);
            }
        },
        props: ['id', 'name', 'email', 'phone', 'country', 'city', 'state', 'zip'],
        filters: {
            properCase(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
        }
    }
</script>

