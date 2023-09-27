<script setup>
defineProps({ merchants: Object, appUrl: String });
</script>

<template>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Browse</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="merchant in merchants">
                <td>{{ merchant.id }}</td>
                <td>{{ merchant.name }}</td>
                <td>
                    <a :href="`${appUrl}/${merchant.id}/users`">go to</a>
                </td>
            </tr>
        </tbody>
    </table>
</template>
