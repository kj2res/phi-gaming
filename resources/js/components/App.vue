<template>
    <div id="app">
        <div class="heading">
            <h1>Contacts</h1>
        </div>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Country</td>
                <td>City</td>
                <td>State</td>
                <td>Zip</td>
                <td>Action</td>
            </tr>
            <view-component
                    v-for="contact in contacts"
                    v-bind="contact"
                    :key="contact.id"
                    @update="update"
                    @delete="del"
            ></view-component>
        </table>
        <div style="margin-top: 10px;">
            <button @click="create()">Add</button>
        </div>
    </div>
</template>

<script>
    function Contact({ id, name, email, phone, country, city, state, zip }) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.phone = phone;
        this.country = country;
        this.city = city;
        this.state = state;
        this.zip = zip;
    }

    import ViewComponent from './contact/view.vue';

    export default {
        data() {
            return {
                contacts: []
            }
        },
        mounted () {
          this.read();
        },
        methods: {
            create() {
                window.axios.get('/api/contacts/create').then(({ data }) => {
                    this.contacts.push(new Contact(data));
                });
            },
            read() {
                window.axios.get('/api/contacts').then(({ data }) => {
                    data.forEach(contact => {
                        this.contacts.push(new Contact(contact));
                    });
                });
            },
            update(id, name) {
                window.axios.put(`/api/contacts/${id}`, { name }).then(() => {
                    this.contacts.find(contact => contact.id === id).color = color;
                });
            },
            del(id) {
                window.axios.delete(`/api/contacts/${id}`).then(() => {
                    let index = this.contacts.findIndex(contact => contact.id === id);
                    this.contacts.splice(index, 1);
                });
            }
        },
        components: {
            ViewComponent
        }
    }
</script>