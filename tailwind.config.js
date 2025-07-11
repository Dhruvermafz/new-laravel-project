export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "../../storage/framework/views/*.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["var(--font-sans)"],
            },
        },
    },
    plugins: [],
};
