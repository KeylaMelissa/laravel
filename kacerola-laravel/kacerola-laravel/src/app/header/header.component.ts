import { Component, OnInit } from '@angular/core';
import { AuthService } from '../usuarios/auth.service';
import { Router } from '@angular/router';
import { EmpresaService } from '../maestros/empresa/empresa.service';
import { Empresa } from '../maestros/empresa/empresa';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  empresa: Empresa;

  nav: Element[] = [];

  constructor(public _authService: AuthService,
              private router: Router,
              private empresaService: EmpresaService) { }

  ngOnInit(): void {
    this.empresaService.getEmpresa(1).subscribe(emp => {
      this.empresa = emp;
    });
    this.nav = [document.querySelector('#inicio'),
                 document.querySelector('#about'),
                 document.querySelector('#productos'),
                 document.querySelector('#blog'),
                 document.querySelector('#contacto')];
  }

  logout(): void {
    this._authService.logout();
    this.router.navigate(['/login']);
  }

  clickNavbar(event) {
    for (let index = 0; index < this.nav.length; index++) {
      if (event.target.id === this.nav[index].id) {
        this.nav[index].classList.add('hover-ct-selected');
      } else {
        this.nav[index].classList.remove('hover-ct-selected');
      }
    }
  }
}
