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

echo "[1/3] Descargando cambios remotos..."
git fetch peer "$branch"
git fetch mine "$branch"

echo
echo "[2/3] Commits que están en el repo de tu compañero y faltan en tu repo:"
missing_from_mine="$(git log --oneline "mine/$branch..peer/$branch")"
if [[ -n "$missing_from_mine" ]]; then
  echo "$missing_from_mine"
else
  echo "No hay commits faltantes ✅"
fi

echo
echo "[3/3] Commits que están en tu repo y no en el de tu compañero:"
missing_from_peer="$(git log --oneline "peer/$branch..mine/$branch")"
if [[ -n "$missing_from_peer" ]]; then
  echo "$missing_from_peer"
else
  echo "No hay commits exclusivos en tu repo ✅"
fi

echo
echo "Sugerencia para traer commits concretos (cherry-pick):"
echo "  git cherry-pick <hash_commit>"
echo "Sugerencia para alinear toda la rama (merge):"
echo "  git checkout $branch && git merge peer/$branch"