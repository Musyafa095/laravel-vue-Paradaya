@extends('layouts.master')
@section('title')
Halaman Register
@endsection
@section('content')
  <h1>Register</h1>
  <form action=' /welcome' method="POST">
    @csrf
       <label for="fname">First Name:</label>
        <input type="text" id="firstname" name="fname" required />
        <br />
        <br />
        <label for="lname">Last Name:</label>
        <input type="text" id="lastname" name="lname" required />
        <br />
        <br />
        <label for="Gender">Gender:</label>
        <input type="radio" id="male" name="Gender" value="male" /> male
        <input type="radio" id="female" name="Gender" value="female" /> female
        <input type="radio" id="other" name="Gender" value="other" /> other
        <br />
        <br />
        <label for="Nationality">Nationality:</label>
        <select name="Nationality" id="Nationality">
          <option value="Indonesia">Indonesia</option>
          <option value="Malaysia">Malaysia</option>
          <option value="Singapura">Singapura</option>
        </select>
        <br />
        <br />
        <label for="Belajar">Sedang Fokus Belajar :</label>
        <select name="Belajar" id="Belajar">
          <option value="React js">React js</option>
          <option value="Laravel">Laravel</option>
          <option value="Vue js">Vue js</option>
        </select>
        <br />
        <br />
        <label for="bahasa">Language Spoken:</label>
        <input
          type="checkbox"
          id="bahasa"
          name="bahasa"
          value="Indonesia"
        />Indonesia
        <input
          type="checkbox"
          id="bahasa"
          name="bahasa"
          value="Inggris"
        />Inggris
        <input type="checkbox" id="bahasa" name="bahasa" value="Jepang" />Jepang
        <input
          type="checkbox"
          id="bahasa"
          name="bahasa"
          value="Spanyol"
        />Spanyol
        <br />
        <br />
        <label for="Deskripsi">Biodata :</label>
        <br />
        <textarea
          name="Deskripsi"
          id="Deskripsi"
          cols="40"
          rows="10"
          placeholder="Biodata"
        ></textarea>
        <br />
        <br />
        <input type="submit" value="Submit" />
      </form>  
      @endsection
