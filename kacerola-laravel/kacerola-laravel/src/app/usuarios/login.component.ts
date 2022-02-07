import { Component, OnInit } from '@angular/core';
import { Usuario } from './usuario';
import { AuthService } from './auth.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  titulo: string = "Inicie Sesion";
  usuario: Usuario;
  nav: Element[] = [];
  opcion: number = 1;

  constructor(private authService: AuthService, private router: Router) {
    this.usuario = new Usuario();
  }

  ngOnInit(): void {
    if (this.authService.isAuthenticated()) {
      //Swal.fire('Login', `${this.authService.usuario.username}, sesion ya iniciada`, 'info');
      this.router.navigate(['/']);
    }
    this.nav = [document.querySelector('#login'),
                 document.querySelector('#registro')];
    this.nav[0].classList.add('hover-ct-selected');
  }

  login(): void {
    if(this.usuario.username == null || this.usuario.password == null) {
      //Swal.fire('Error Login', 'Usuario o Password vacios', 'error');
      return;
    }

    this.authService.login(this.usuario).subscribe(response => {
      this.authService.guardarUsuario(response.access_token);
      this.authService.guardarToken(response.access_token);

      let usuario = this.authService.usuario;
    }, err => {
      if (err.status == 400) {
        console.log(err);
      }
    });
  }

  clickNavbar(event) {
    for (let index = 0; index < this.nav.length; index++) {
      if (event.target.id === this.nav[index].id) {
        this.nav[index].classList.add('hover-ct-selected');
        this.opcion = index + 1;
      } else {
        this.nav[index].classList.remove('hover-ct-selected');
      }
    }
  }
}
