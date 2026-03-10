#!/usr/bin/env bash
set -euo pipefail

if [[ $# -lt 2 || $# -gt 3 ]]; then
  echo "Uso: $0 <repo_companero_url> <mi_repo_url> [rama]"
  echo "Ejemplo: $0 https://github.com/alguien/proyecto.git https://github.com/yo/proyecto.git main"
  exit 1
fi

peer_url="$1"
mine_url="$2"
branch="${3:-main}"

workdir="$(git rev-parse --show-toplevel)"
cd "$workdir"

add_or_set_remote() {
  local name="$1"
  local url="$2"

  if git remote get-url "$name" >/dev/null 2>&1; then
    git remote set-url "$name" "$url"
  else
    git remote add "$name" "$url"
  fi
}

add_or_set_remote "peer" "$peer_url"
add_or_set_remote "mine" "$mine_url"

echo "[1/4] Descargando cambios remotos..."
git fetch peer "$branch"
git fetch mine "$branch"

echo
echo "[2/4] Archivos que existen en el repo de tu compañero y NO en tu repo:"
only_in_peer="$(git diff --name-status "mine/$branch" "peer/$branch" | awk '$1 == "A" {print $2}')"
if [[ -n "$only_in_peer" ]]; then
  echo "$only_in_peer"
else
  echo "No hay archivos faltantes en tu repo ✅"
fi

echo
echo "[3/4] Archivos que existen en tu repo y NO en el de tu compañero:"
only_in_mine="$(git diff --name-status "mine/$branch" "peer/$branch" | awk '$1 == "D" {print $2}')"
if [[ -n "$only_in_mine" ]]; then
  echo "$only_in_mine"
else
  echo "No hay archivos exclusivos en tu repo ✅"
fi

echo
echo "[4/4] Archivos compartidos pero con contenido diferente:"
modified_files="$(git diff --name-status "mine/$branch" "peer/$branch" | awk '$1 == "M" {print $2}')"
if [[ -n "$modified_files" ]]; then
  echo "$modified_files"
else
  echo "No hay diferencias de contenido entre archivos compartidos ✅"
fi

echo
echo "Sugerencia para inspeccionar diferencias de un archivo:"
echo "  git diff mine/$branch peer/$branch -- <ruta/archivo>"
echo "Sugerencia para traer un archivo desde el repo compañero:"
echo "  git checkout peer/$branch -- <ruta/archivo>"