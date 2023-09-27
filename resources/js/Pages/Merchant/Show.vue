<script setup>
defineProps({ merchantId: String, users: Object, appUrl: String });
</script>

<style>
h1 {
    font-size: 4em;
}
</style>

<template>
    <h1 class="text-6xl text-center">{{ merchantName }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>

                <td>
                    <a :href="`${appUrl}/${merchantId}/users/${user.id}`"
                        >go to</a
                    >
                </td>
            </tr>
        </tbody>
    </table>
</template>
