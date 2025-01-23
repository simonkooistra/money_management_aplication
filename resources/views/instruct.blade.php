@extends('layouts.layout')

@section('title', 'Instruct')

@section('content')
    <div class="container">
        <h1>Application Instructions</h1>
        <p>Welcome to the Saving Goals Application! This guide will explain how to use the application and manage your saving goals and categories effectively.</p>

        <h2>What is This Application?</h2>
        <p>
            This application helps you manage your financial saving goals. You can:
        </p>
        <ul>
            <li>Create and manage saving goals with specific target amounts.</li>
            <li>Group saving goals into custom categories.</li>
            <li>Track all your savings on the homepage.</li>
        </ul>

        <h2>How to Use the Application?</h2>

        <h3>1. Authentication</h3>
        <p>You need to create an account or log in to access the application.</p>
        <ul>
            <li><strong>Register</strong>: Visit the registration page, fill in your details (name, email, password), and submit.</li>
            <li><strong>Login</strong>: Visit the login page, enter your email and password, and submit.</li>
            <li><strong>Logout</strong>: Use the "Logout" button in the sidebar to log out of your account.</li>
        </ul>

        <h3>2. Total Page (Homepage)</h3>
        <p>
            Visit the homepage by clicking <strong>Home (totaalpagina)</strong> in the sidebar. It provides an overview of:
        </p>
        <ul>
            <li>All your saving goals with their target amounts and descriptions.</li>
            <li>All the categories you have created.</li>
        </ul>

        <h3>3. Categories</h3>
        <p>Categories allow you to group your saving goals.</p>
        <ul>
            <li><strong>Create a Category</strong>: Go to the "Categories" page, click "Create New Category", enter a name, and submit.</li>
            <li><strong>View Categories</strong>: View all your created categories on the "Categories" page.</li>
            <li><strong>Edit a Category</strong>: Click "Edit" next to a category, update the name, and submit.</li>
            <li><strong>Delete a Category</strong>: Click "Delete" next to a category, confirm when prompted, and it will be removed permanently.</li>
        </ul>

        <h3>4. Saving Goals</h3>
        <p>Saving goals help you set target amounts for your savings.</p>
        <ul>
            <li><strong>Create a Saving Goal</strong>:
                Go to the "Savings" page, click "Add New Saving Goal", fill in the details (name, description, amount, category), and submit.
            </li>
            <li><strong>View Saving Goals</strong>: See all your saving goals on the "Savings" page, including target amounts and descriptions.</li>
            <li><strong>Edit a Saving Goal</strong>: Click "Edit" next to a saving goal, update the details, and submit.</li>
            <li><strong>Delete a Saving Goal</strong>: Click "Delete" next to a saving goal, confirm when prompted, and it will be removed permanently.</li>
        </ul>

        <h2>Quick Tips</h2>
        <ul>
            <li>Make sure to create categories before creating saving goals so you can assign goals to them.</li>
            <li>Use descriptive names for your goals and categories for better organization.</li>
            <li>You can always edit or delete goals/categories later if needed.</li>
        </ul>

        <h2>Next Steps</h2>
        <p>Start by exploring the links in the sidebar: create categories, add saving goals, and track them on the homepage. Happy saving!</p>
    </div>
@endsection