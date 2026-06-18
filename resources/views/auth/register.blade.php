<form action="{{ route('register.store') }}">

    <h1>Register</h1>

    <p>
        <label>
            Name
            <input type="text" placeholder="John Carmack" min="3" required />
        </label>
    </p>

    <p>
        <label>
            Email
            <input type="email" placeholder="johncarmack@gmail.com" min="5" max="35" required />
        </label>
    </p>

    <p>
        <label>
            Password
            <input type="password" placeholder="***********" required />
        </label>
    </p>

    <button type="submit">Register</button>

</form>