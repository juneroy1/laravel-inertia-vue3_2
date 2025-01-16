<template>
    <nav>
        <ul>
            <li>
                <Link href="/">Home</Link>
            </li>
            <li>
                <Link href="/contact">Contact</Link>
            </li>
            <li>
                <Link href="/settings">Settings</Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {Link}
}

</script>