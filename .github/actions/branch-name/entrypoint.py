#!/usr/bin/env python3

import os
import re
import sys


def validate(branch):
    pattern = re.compile(os.getenv("INPUT_VALIDATE_REGEXP"))
    if pattern.match(branch):
        print("::notice title=Branch Name Validator::Branch name validation passed")
        sys.exit(0)
    error_message = os.getenv("INPUT_ERROR_MESSAGE").format(branch=branch)
    print("::error title=Branch Name Validator::{error_message}".format(error_message=error_message))
    sys.exit(1)


if __name__ == "__main__":
    branch_name = os.getenv("GITHUB_HEAD_REF")
    validate(branch=branch_name)
